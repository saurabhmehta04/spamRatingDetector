package com.team.srdparser;
import java.io.BufferedWriter;
import java.io.FileWriter;
import java.io.IOException;
import java.net.URL;
import java.util.ArrayList;

import javax.xml.parsers.SAXParser;
import javax.xml.parsers.SAXParserFactory;

import org.xml.sax.InputSource;
import org.xml.sax.XMLReader;

public class Parser {

	public static void main(String[] args) throws IOException {
		// TODO Auto-generated method stub

		// MacBook Pro Retina : 5430505
		// Dell - Inspiron 7000 Series : 1753359
		// Lenovo Yoga 2 : 1817254

		//getData("5430505");
	}

	public int getTotalPages(String sku) {
		GetSetData tagsList;
		String[] m_str_r_Rating = null;
		String[] m_str_r_Title = null;
		String[] m_str_r_Comment = null;
		int numOfRecords = 0;
		int totalPages = 0;

		String url = "http://api.remix.bestbuy.com/v1/reviews(sku="+sku+")?apiKey=ef9r6zrhh6vpsctn36pnfd8w&sort=rating.asc&pageSize=100";
		try {

			// ** Handling XML *//*
			URL website = new URL(url);
			SAXParserFactory spf = SAXParserFactory.newInstance();
			SAXParser sp = spf.newSAXParser();
			XMLReader xr = sp.getXMLReader();

			XMLHandler myXMLHandler = new XMLHandler();

			xr.setContentHandler(myXMLHandler);
			xr.parse(new InputSource(website.openStream()));

			tagsList = XMLHandler.getTags;
			
			totalPages = tagsList.getTotalPages();


		} catch (Exception e) {
			System.out.println(e.getMessage());
		}

		//System.out.println(totalPages);
		return totalPages;
	}

	public String getData(String sku) throws IOException {
		
		String filename = "/home/arpeet/Desktop/data.txt";
		BufferedWriter writer = new BufferedWriter(new FileWriter(filename));
		
		GetSetData tagsList;
		String[] m_str_r_Rating = null;
		String[] m_str_r_Title = null;
		String[] m_str_r_Comment = null;
		int numOfRecords = 0;
		int totalPages = 0;
		
		
		totalPages = getTotalPages(sku);
		try {

			for (int j = 1; j < totalPages; j++) 
			{
				String url = "http://api.remix.bestbuy.com/v1/reviews(sku="+sku+")?apiKey=ef9r6zrhh6vpsctn36pnfd8w&sort=rating.asc&pageSize=100&page="+j;
				
				// ** Handling XML *//*
				URL website = new URL(url);
				SAXParserFactory spf = SAXParserFactory.newInstance();
				SAXParser sp = spf.newSAXParser();
				XMLReader xr = sp.getXMLReader();

				XMLHandler myXMLHandler = new XMLHandler();

				xr.setContentHandler(myXMLHandler);
				xr.parse(new InputSource(website.openStream()));

				tagsList = XMLHandler.getTags;

				m_str_r_Rating = new String[tagsList.getRating().size()];
				m_str_r_Rating = tagsList.getRating().toArray(m_str_r_Rating);

				m_str_r_Comment = new String[tagsList.getComment().size()];
				m_str_r_Comment = tagsList.getComment()
						.toArray(m_str_r_Comment);

				m_str_r_Title = new String[tagsList.getTitle().size()];
				m_str_r_Title = tagsList.getTitle().toArray(m_str_r_Title);

				for (int i = 0; i < m_str_r_Rating.length; i++) {

					//System.out.println(m_str_r_Rating[i] + " "+ m_str_r_Comment[i]);
					writer.append(m_str_r_Rating[i] + " "+ m_str_r_Comment[i]+"\n");
					numOfRecords++;
				}

			}
			writer.close();
			
		} catch (Exception e) {
			writer.close();
			System.out.println(e.getMessage());
		}

		System.out.println(numOfRecords);
		System.out.println(totalPages);
		return filename;
	}

}
