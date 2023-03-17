package com.fida.back_end.repository;

import org.springframework.data.repository.CrudRepository;
import org.springframework.stereotype.Repository;

import com.fida.back_end.entity.Product;

@Repository
public interface ProductRepository extends CrudRepository<Product,Long>{
	
}
