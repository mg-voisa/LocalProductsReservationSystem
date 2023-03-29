package com.fida.back_end.controller;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.validation.annotation.Validated;
import org.springframework.web.bind.annotation.DeleteMapping;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.PutMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

import com.fida.back_end.entity.Product;
import com.fida.back_end.service.ProductService;

@RestController
@RequestMapping("/products")
public class ProductController {
	// Annotation
    @Autowired private ProductService productService;
    
 // Save operation
    @PostMapping("/adauga")
    public Product adauga(@Validated @RequestBody Product product)
    {
    	System.out.println("product:"+product);
        return productService.adauga(product);
    }
  
    // Read operation
    @GetMapping("/vezi")
    public List<Product> vezi()
    {
  
        return productService.vezi();
    }
  
    // Update operation
    @PutMapping("/update/{id}")
    public Product
    updateProduct(@RequestBody Product product,
                     @PathVariable("id") Long productId)
    {
  
        return productService.modifica(
            product, productId);
    }
  
    // Delete operation
    @DeleteMapping("/sterge/{id}")
    public String sterge(@PathVariable("id") Long productId)
    {
  
        productService.sterge(productId);
        return "Deleted Successfully";
    }
}
