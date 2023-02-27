package com.fida.config;

import javax.sql.DataSource;

import org.springframework.context.annotation.Bean;
import org.springframework.jdbc.core.JdbcTemplate;
import org.springframework.jdbc.datasource.DriverManagerDataSource;
import org.springframework.web.WebApplicationInitializer;
import org.springframework.web.context.ContextLoaderListener;
import org.springframework.web.context.support.AnnotationConfigWebApplicationContext;
import org.springframework.web.context.support.GenericWebApplicationContext;
import org.springframework.web.servlet.DispatcherServlet;

import jakarta.servlet.ServletContext;
import jakarta.servlet.ServletException;
import jakarta.servlet.ServletRegistration;



public class MainWebAppInitializer  implements WebApplicationInitializer{



	@Override
	public void onStartup(ServletContext servletContext) throws ServletException {
		
		AnnotationConfigWebApplicationContext root = 
		          new AnnotationConfigWebApplicationContext();
		        
		        root.scan("com.fida");
		        servletContext.addListener(new ContextLoaderListener(root));

		        ServletRegistration.Dynamic appServlet = 
		        		servletContext.addServlet("mvc", new DispatcherServlet(new GenericWebApplicationContext()));
		        appServlet.setLoadOnStartup(1);
		        appServlet.addMapping("/");
	}

	
	 
	
}
