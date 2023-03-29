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

import com.fida.back_end.entity.User;
import com.fida.back_end.service.UserService;


@RestController
@RequestMapping("/users")
public class UserController {
	
	// Annotation
    @Autowired private UserService userService;
    
    // Save operation
    @PostMapping("/adauga")
    public User adauga(@Validated @RequestBody User user)
    {
    	System.out.println("user:"+user);
        return userService.adauga(user);
    }
  
    // Read operation
    @GetMapping("/vezi")
    public List<User> vezi()
    {
  
        return userService.vezi();
    }
  
    // Update operation
    @PutMapping("/update/{id}")
    public User updateUser(@RequestBody User user,   @PathVariable("id") Long userId)
    {
  
        return userService.modifica(
            user, userId);
    }
  
    // Delete operation
    @DeleteMapping("/sterge/{id}")
    public String sterge(@PathVariable("id") Long userId)
    {
  
        userService.sterge(userId);
        return "Deleted Successfully";
    }
}
