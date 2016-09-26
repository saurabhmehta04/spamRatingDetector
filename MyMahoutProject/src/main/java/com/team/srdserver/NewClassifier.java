package com.team.srdserver;

import java.io.BufferedReader;
import java.io.FileReader;
import java.io.IOException;
import java.io.StringReader;
import java.util.HashMap;
import java.util.Map;

import org.apache.hadoop.conf.Configuration;
import org.apache.hadoop.fs.Path;
import org.apache.hadoop.io.IntWritable;
import org.apache.hadoop.io.LongWritable;
import org.apache.hadoop.io.Text;
import org.apache.lucene.analysis.Analyzer;
import org.apache.lucene.analysis.TokenStream;
import org.apache.lucene.analysis.standard.StandardAnalyzer;
import org.apache.lucene.analysis.tokenattributes.CharTermAttribute;
import org.apache.lucene.util.Version;
import org.apache.mahout.classifier.naivebayes.BayesUtils;
import org.apache.mahout.classifier.naivebayes.NaiveBayesModel;
import org.apache.mahout.classifier.naivebayes.StandardNaiveBayesClassifier;
import org.apache.mahout.common.Pair;
import org.apache.mahout.common.iterator.sequencefile.SequenceFileIterable;
import org.apache.mahout.math.RandomAccessSparseVector;
import org.apache.mahout.math.Vector;
import org.apache.mahout.math.Vector.Element;
import org.apache.mahout.vectorizer.TFIDF;

import com.google.common.collect.ConcurrentHashMultiset;
import com.google.common.collect.Multiset;

public class NewClassifier 
{

	public static Map<String, Integer> readDictionnary(Configuration conf,
			Path dictionnaryPath) 
		{
		Map<String, Integer> dictionnary = new HashMap<String, Integer>();
		for (Pair<Text, IntWritable> pair : new SequenceFileIterable<Text, IntWritable>(
				dictionnaryPath, true, conf)) {
			dictionnary.put(pair.getFirst().toString(), pair.getSecond().get());
		}
		return dictionnary;
	}

	public static Map<Integer, Long> readDocumentFrequency(Configuration conf,
			Path documentFrequencyPath) {
		Map<Integer, Long> documentFrequency = new HashMap<Integer, Long>();
		for (Pair<IntWritable, LongWritable> pair : new SequenceFileIterable<IntWritable, LongWritable>(
				documentFrequencyPath, true, conf)) {
			documentFrequency
					.put(pair.getFirst().get(), pair.getSecond().get());
		}
		return documentFrequency;
	}
	
	public String getResult(String testFilePath) throws IOException
	{
		String modelPath = "/home/arpeet/Desktop/PROJECT/model";
		String labelIndexPath = "/home/arpeet/Desktop/PROJECT/labelindex";
		String dictionaryPath = "/home/arpeet/Desktop/PROJECT/spam-vec/dictionary.file-0";
		String documentFrequencyPath = "/home/arpeet/Desktop/PROJECT/spam-vec/df-count/part-r-00000";
		String testPath = testFilePath;
		int spamCount = 0;
		int instanceID =0;
		Configuration configuration = new Configuration();

		// model is a matrix (wordId, labelId) => probability score
		NaiveBayesModel model = NaiveBayesModel.materialize(new Path(modelPath), configuration);

		StandardNaiveBayesClassifier classifier = new StandardNaiveBayesClassifier(model);

		// labels is a map label => classId
		Map<Integer, String> labels = BayesUtils.readLabelIndex(configuration,
				new Path(labelIndexPath));
		Map<String, Integer> dictionary = readDictionnary(configuration,
				new Path(dictionaryPath));
		Map<Integer, Long> documentFrequency = readDocumentFrequency(
				configuration, new Path(documentFrequencyPath));

		// analyzer used to extract word from tweet
		Analyzer analyzer = new StandardAnalyzer(Version.LUCENE_43);

		int labelCount = labels.size();
		int documentCount = documentFrequency.get(-1).intValue();

		System.out.println("Number of labels: " + labelCount);
		//System.out.println("Number of documents in training set: "
			//	+ documentCount);
		BufferedReader reader = new BufferedReader(new FileReader(testPath));
		
		while (true) 
		{
			String line = reader.readLine();
			instanceID++;
			if (line == null) 
			{
				break;
			}

			//String[] tokens = testInstance.split(",", 2);
			String insID = ""+instanceID;//tokens[0];
			//String tweet = testInstance; 
			String review = line;
			//"5.0 This is a bad product";//tokens[1];

			System.out.println("Review: " + insID + "\t" + review);

			Multiset<String> words = ConcurrentHashMultiset.create();

			// extract words from tweet
			TokenStream ts = analyzer.tokenStream("text", new StringReader(review));
			CharTermAttribute termAtt = ts.addAttribute(CharTermAttribute.class);
			ts.reset();
			int wordCount = 0;
			while (ts.incrementToken()) {
				if (termAtt.length() > 0) {
					String word = ts.getAttribute(CharTermAttribute.class)
							.toString();
					Integer wordId = dictionary.get(word);
					// if the word is not in the dictionary, skip it
					if (wordId != null) {
						words.add(word);
						wordCount++;
					}
				}
			}

			// create vector wordId => weight using tfidf
			Vector vector = new RandomAccessSparseVector(10000);
			TFIDF tfidf = new TFIDF();
			for (Multiset.Entry<String> entry : words.entrySet()) {
				String word = entry.getElement();
				int count = entry.getCount();
				Integer wordId = dictionary.get(word);
				Long freq = documentFrequency.get(wordId);
				double tfIdfValue = tfidf.calculate(count, freq.intValue(),
						wordCount, documentCount);
				vector.setQuick(wordId, tfIdfValue);
			}
			// With the classifier, we get one score for each label
			// The label with the highest score is the one the tweet is more
			// likely to
			// be associated to
			Vector resultVector = classifier.classifyFull(vector);
			double bestScore = -Double.MAX_VALUE;
			int bestCategoryId = -1;
			for (Element element : resultVector.all()) {
				int categoryId = element.index();
				double score = element.get();
				if (score > bestScore) {
					bestScore = score;
					bestCategoryId = categoryId;
				}
				//System.out.print(" " + labels.get(categoryId) + ": " + score);
			}
			System.out.println(" => " + labels.get(bestCategoryId));
			if(labels.get(bestCategoryId).toString().equalsIgnoreCase("SPAM"))
			{
				spamCount++;
			}
		}
		analyzer.close();
		reader.close();
		
		return Integer.toString(spamCount);
		//return labels.get(bestCategoryId).toString();
	}

	public static void main(String[] args) throws Exception {
		/*if (args.length < 5) {
			System.out
					.println("Arguments: [model] [label index] [dictionnary] [document frequency] [tweet file]");
			return;
		}*/
		NewClassifier nc = new NewClassifier();
		System.out.println("RESULT IS: "+nc.getResult("/home/arpeet/Desktop/data.txt"));
	}
}

