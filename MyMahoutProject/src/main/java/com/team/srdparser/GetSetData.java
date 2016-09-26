package com.team.srdparser;

import java.util.ArrayList;

public class GetSetData {

	private ArrayList<String> rating = new ArrayList<String>();
	private ArrayList<String> title = new ArrayList<String>();
	private ArrayList<String> comment = new ArrayList<String>();
	private int totalPages = 0;

	// Get & Set Text between rating
	public ArrayList<String> getRating() {
		return rating;
	}

	public void setRating(String rating) {
		this.rating.add(rating);
	}

	// Get & Set Text as value for comment
	public ArrayList<String> getComment() {
		return comment;
	}

	public void setComment(String comment) {
		this.comment.add(comment);
	}

	// Get & Set Text for title
	public ArrayList<String> getTitle() {
		return title;
	}

	public void setTitle(String title) {
		this.title.add(title);
	}

	// Get & Set Total Pages for title
	public int getTotalPages() {
		return totalPages;
	}

	public void setTotalPages(int totalPages) {
		this.totalPages=totalPages;
	}

}
