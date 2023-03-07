package com.fida.service;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import com.fida.dao.MainDao;
import com.fida.dao.SampleDao;

@Service
public class MainService {
	@Autowired
	private MainDao mainDao;

	public String entry_main() {
		return mainDao.entryMain();
		
	}
	
	
	
}
