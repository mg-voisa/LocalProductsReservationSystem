package com.fida.back_end.service;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import com.fida.back_end.entity.User;
import com.fida.back_end.repository.UserRepository;
@Service
public class UserServiceImplementation implements UserService{

	@Autowired
    private UserRepository userRepository;
	
	@Override
	public User adauga(User user) {
		System.out.println("user:"+user);
		return userRepository.save(user);
	}

	@Override
	public List<User> vezi() {
		return (List<User>) userRepository.findAll();
	}

	@Override
	public User modifica(User user, Long userId) {
		// TODO Auto-generated method stub
		User prodDB = userRepository.findById(userId).get();
		  
//        if (Objects.nonNull(user.getProdus()) && !"".equalsIgnoreCase(product.getProdus())) {
//        	prodDB.setProdus(product.getProdus());
//        }
  
        return userRepository.save(prodDB);
	}

	@Override
	public void sterge(Long userId) {
		// TODO Auto-generated method stub
		userRepository.deleteById(userId);
	}

}
