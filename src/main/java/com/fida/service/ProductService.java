package com.fida.service;

import java.util.List;
import java.util.Map;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import com.fida.dao.ProductDao;
@Service
public class ProductService {
	@Autowired
    ProductDao productDao;
	
	public List<Map<String, Object>> findProductById() {
		
		
		return productDao.findProductById();
	}

}
