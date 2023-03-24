package com.demo.frontend.service;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;
import java.util.Map;

import org.springframework.core.ParameterizedTypeReference;
import org.springframework.http.ResponseEntity;
import org.springframework.stereotype.Service;
import org.springframework.web.client.RestTemplate;

import com.fasterxml.jackson.databind.ObjectMapper;


@Service
public class BookingService {

	public List getListProducts() {
		HashMap<String, Long> params = new HashMap<>();
		//params.put("userId", orderDetails.getUserId());
		ResponseEntity<Object[]> response = new RestTemplate().getForEntity(
		            "http://localhost:9090/back-end/products",
		            Object[].class);
		Object[] objects = response.getBody();
		List<Map<String,Object>> produse = new ArrayList<>();
		
		ObjectMapper oMapper = new ObjectMapper();
		
		for(Object obj: objects) {
			Map<String,Object> map_produs = oMapper.convertValue(obj, Map.class);
			produse.add(map_produs);
		}
		
		System.out.println("produse:"+produse);
		return produse;
	}
	
}
