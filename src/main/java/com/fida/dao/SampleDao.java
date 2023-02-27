package com.fida.dao;

import org.springframework.stereotype.Repository;

@Repository
public class SampleDao {

	public String testSample() {
		System.out.println("call DAO!");
		return "success";
	}
	
}
