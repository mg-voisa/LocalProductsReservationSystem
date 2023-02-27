package com.fida.controller;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;
import org.springframework.web.bind.annotation.ResponseBody;
import org.springframework.web.servlet.config.annotation.EnableWebMvc;

import com.fida.service.SampleService;

@Controller
@EnableWebMvc
@RequestMapping("/sample")
public class SampleController {
	@Autowired
	private SampleService sampleService;
	
	@RequestMapping(value = "/verify", method = RequestMethod.GET)
	public String verify() {
		System.out.println("verify sample!");
		String response = sampleService.testSample();
		System.out.println("res:"+response);
		return "sample";
	}
}
