package com.fida.controller;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;
import org.springframework.web.servlet.config.annotation.EnableWebMvc;

import com.fida.service.MainService;
import com.fida.service.SampleService;
@Controller
@EnableWebMvc
@RequestMapping("/")
public class MainController {
		@Autowired
		private MainService mainService;
		
		@RequestMapping( method = RequestMethod.GET)
		public String index() {
			System.out.println("verify sample!");
			String response = mainService.entry_main();
			System.out.println("res:"+response);
			return "sample";
		}
	}
