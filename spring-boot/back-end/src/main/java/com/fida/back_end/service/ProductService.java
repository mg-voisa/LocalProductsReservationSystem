package com.fida.back_end.service;

import java.util.List;

import com.fida.back_end.entity.Product;

public interface ProductService {
	//CRUD
	//save
	public Product adauga(Product product);
	//read
	public List<Product> vezi();
	//update
	public Product modifica(Product product, Long productId);
	//delete
	public void sterge(Long productId);
	//fk
	//public void asociazaIngrediente();
}
