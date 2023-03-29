package com.fida.back_end.repository;

import org.springframework.data.repository.CrudRepository;
import org.springframework.stereotype.Repository;

import com.fida.back_end.entity.User;

@Repository
public interface UserRepository extends CrudRepository<User,Long>{

}