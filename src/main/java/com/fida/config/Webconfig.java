package com.fida.config;

import javax.sql.DataSource;

import org.springframework.context.annotation.Bean;
import org.springframework.context.annotation.ComponentScan;
import org.springframework.context.annotation.Configuration;
import org.springframework.jdbc.core.JdbcTemplate;
import org.springframework.jdbc.datasource.DriverManagerDataSource;
import org.springframework.web.servlet.ViewResolver;
import org.springframework.web.servlet.config.annotation.EnableWebMvc;
import org.springframework.web.servlet.config.annotation.ResourceHandlerRegistry;
import org.springframework.web.servlet.config.annotation.ViewControllerRegistry;
import org.springframework.web.servlet.config.annotation.WebMvcConfigurer;
import org.springframework.web.servlet.view.InternalResourceViewResolver;
import org.springframework.web.servlet.view.JstlView;

@Configuration
@EnableWebMvc
@ComponentScan(basePackages = {"com.fida.config", "com.fida.controller", "com.fida.service", "com.fida.dao"})
public class Webconfig implements WebMvcConfigurer{
	//ultima adaugare
//	private static final String[] CLASSPATH_RESOURCE_LOCATIONS = {
//	        "classpath:/META-INF/resources/", "classpath:/resources/",
//	        "classpath:/static/", "classpath:/public/" };
//	
//	@Override
//	public void addResourceHandlers(ResourceHandlerRegistry registry) {
//	    registry.addResourceHandler("/**").addResourceLocations(CLASSPATH_RESOURCE_LOCATIONS);
//	}
	//
	
	@Override
    public void addResourceHandlers(ResourceHandlerRegistry registry) {
        registry
          .addResourceHandler("/resources/**")
          .addResourceLocations("/resources/");	
    }
	
	 @Override
	   public void addViewControllers(ViewControllerRegistry registry) {
	      registry.addViewController("/").setViewName("index");
	   }

	   @Bean
	   public ViewResolver viewResolver() {
		   System.out.println("viewResolver access!");
	      InternalResourceViewResolver bean = new InternalResourceViewResolver();

	      bean.setViewClass(JstlView.class);
	      bean.setPrefix("/WEB-INF/view/");
	      bean.setSuffix(".jsp");

	      return bean;
	   }
	   
	   @Bean
		 public DataSource dataSource() {
		 	DriverManagerDataSource dataSource = new DriverManagerDataSource();
		 
		     dataSource.setDriverClassName("com.mysql.jdbc.Driver");
		     dataSource.setUrl("jdbc:mysql://localhost:3306/db_local_prod");
		     dataSource.setUsername("root");
		     dataSource.setPassword("");
		 
		     return dataSource;
		 }
		     
		 @Bean
		 public JdbcTemplate jdbcTemplate(DataSource dataSource) {
		     return new JdbcTemplate(dataSource);
		 }

}
