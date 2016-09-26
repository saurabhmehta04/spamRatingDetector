package com.team.srdparser;


import org.xml.sax.Attributes;
import org.xml.sax.SAXException;
import org.xml.sax.helpers.DefaultHandler;

public class XMLHandler extends DefaultHandler 
{

	Boolean currentElement = false;
	String currentValue = null;
	
	public static GetSetData getTags;
	
	@Override
	public void startElement(String URI, String localName,
							 String qName, Attributes attributes) throws SAXException
	{
		currentElement = true;
		
		if (qName.equals("reviews"))
		{
			/** Start of XML File */ 
			getTags = new GetSetData();
			if(attributes.getValue("totalPages")!=null)
			{
				//System.out.println(attributes.getValue("totalPages"));
				getTags.setTotalPages(Integer.parseInt(attributes.getValue("totalPages")));
			}
			
		}
		/*else if(attributes.equals("totalPages"))
		{
			getTags.setTotalPages(Integer.parseInt(currentValue));
		}*/
		
	}
	
	@Override
	public void endElement(String URI, String localName, String qName)throws SAXException 
	{
		currentElement=false;
		
		if (qName.equalsIgnoreCase("rating"))
		{
			getTags.setRating(currentValue);
			
		}
		
		else if(qName.equals("comment"))
		{
			getTags.setComment(currentValue);
		}
		
		else if(qName.equals("title"))
		{
			getTags.setTitle(currentValue);
		}
		
		/*else if(qName.equals("totalPages"))
		{
			getTags.setTotalPages(Integer.parseInt(currentValue));
		}*/
	}
	

	@Override
	public void characters(char[] ch, int start, int length)throws SAXException 
	{

		if (currentElement) 
		{
			currentValue = new String(ch, start, length);
			currentElement = false;
		}

	}
	
}
