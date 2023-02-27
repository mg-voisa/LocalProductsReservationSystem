package com.fida.dao;

import java.util.List;
import java.util.Map;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.jdbc.core.JdbcTemplate;
import org.springframework.stereotype.Repository;
@Repository
public class ProductDao {
	@Autowired
    JdbcTemplate jdbcTemplate;
	
	public List<Map<String, Object>> findProductById() {
		String id = "1";
        String sql = "select * from db_local_prod.produse p where p.id="+id;
        return jdbcTemplate.queryForList(sql);
    }
}
