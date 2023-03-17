package com.fida.back_end.service;

import java.util.List;
import java.util.Objects;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import com.fida.back_end.entity.Product;
import com.fida.back_end.repository.ProductRepository;

@Service
public class ProductServiceImplementation implements ProductService{

	@Autowired
    private ProductRepository productRepository;
	
	@Override
	public Product adauga(Product product) {
		System.out.println("product:"+product);
		return productRepository.save(product);
	}

	@Override
	public List<Product> vezi() {
		return (List<Product>) productRepository.findAll();
	}

	@Override
	public Product modifica(Product product, Long productId) {
		// TODO Auto-generated method stub
		Product prodDB = productRepository.findById(productId).get();
		  
        if (Objects.nonNull(product.getProdus()) && !"".equalsIgnoreCase(product.getProdus())) {
        	prodDB.setProdus(product.getProdus());
        }
  
        return productRepository.save(prodDB);
	}

	@Override
	public void sterge(Long productId) {
		// TODO Auto-generated method stub
		productRepository.deleteById(productId);
	}

}
