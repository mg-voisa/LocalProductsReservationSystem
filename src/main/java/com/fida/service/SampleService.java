package com.fida.service;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import com.fida.dao.SampleDao;

@Service
public class SampleService {
	@Autowired
	private SampleDao sampleDao;
	
	public String testSample() {
		System.out.println("call Service!");
		String response = sampleDao.testSample();
		return response;
	}
}
