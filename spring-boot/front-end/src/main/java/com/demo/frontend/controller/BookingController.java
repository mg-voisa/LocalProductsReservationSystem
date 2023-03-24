package com.demo.frontend.controller;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RequestMapping;

import com.demo.frontend.service.BookingService;

@Controller
@RequestMapping("/booking")
public class BookingController {
	@Autowired
	private BookingService bookingService;
	
	
    @GetMapping("/viewProducts")
    public String viewBooks(Model model) {
        model.addAttribute("products", bookingService.getListProducts());
        
        return "view-products";
    }
    @GetMapping("/index")
    public String index(Model model) {
    	return "index";
    }
    @GetMapping("/meniu")
    public String meniu(Model model) {
    	model.addAttribute("products", bookingService.getListProducts());
    	return "meniu";
    }
}
