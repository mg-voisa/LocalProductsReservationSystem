package com.fida.controller;

import java.util.ArrayList;
import java.util.List;
import java.util.Map;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;
import org.springframework.web.servlet.config.annotation.EnableWebMvc;

import com.fida.service.ProductService;
@Controller
@EnableWebMvc
@RequestMapping("/product")
public class ProductController {
	@Autowired
    ProductService productService;
	
	@RequestMapping(value = "/findProductById", method = RequestMethod.GET)
	public String findProductById() {
        System.out.println("call findProductById<1>!");
		List<Map<String, Object>> list = new ArrayList();
		
		list = productService.findProductById();
		System.out.println("list:"+list);
		
        return "sample";
    }
	
	@RequestMapping(value = "/", method = RequestMethod.GET)
	public String getIndex() {//model
		//meniu
		
		//bine-ati-venit
		
		//promotii
		
		//recenzii
		
		//galerie
		
		//footer-contact
		
		return "index";
	}
}
