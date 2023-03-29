package com.fida.back_end.service;

import java.util.List;

import com.fida.back_end.entity.User;

public interface UserService {
	//CRUD
	//save
	public User adauga(User user);
	//read
	public List<User> vezi();
	//update
	public User modifica(User user, Long userId);
	//delete
	public void sterge(Long userId);
}
