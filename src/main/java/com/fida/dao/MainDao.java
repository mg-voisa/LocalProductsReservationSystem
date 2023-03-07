package com.fida.dao;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.jdbc.core.JdbcTemplate;
import org.springframework.stereotype.Repository;

@Repository
public class MainDao {
	
	@Autowired
	JdbcTemplate jdbcTemplate;
	
	public String entryMain() {
		return "sample";
	}

}
