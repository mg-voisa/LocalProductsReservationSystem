package com.demo.frontend.config;

import org.springframework.context.annotation.Bean;
import org.springframework.context.annotation.Configuration;
import org.springframework.security.config.annotation.web.builders.HttpSecurity;
import org.springframework.security.config.annotation.web.configuration.EnableWebSecurity;
import org.springframework.security.core.userdetails.User;
import org.springframework.security.core.userdetails.UserDetails;
import org.springframework.security.crypto.bcrypt.BCryptPasswordEncoder;
import org.springframework.security.crypto.password.PasswordEncoder;
import org.springframework.security.provisioning.InMemoryUserDetailsManager;
import org.springframework.security.web.SecurityFilterChain;
import org.springframework.security.web.authentication.AuthenticationFailureHandler;
import org.springframework.security.web.authentication.logout.LogoutSuccessHandler;
import org.springframework.security.web.util.matcher.AntPathRequestMatcher;

@Configuration
@EnableWebSecurity
public class SecSecurityConfig {

    @Bean
    public InMemoryUserDetailsManager userDetailsService() {
        // InMemoryUserDetailsManager (see below)
    	UserDetails user1 = User.withUsername("user1")
                .password(passwordEncoder().encode("user1Pass"))
                .roles("USER")
                .build();
            UserDetails user2 = User.withUsername("user2")
                .password(passwordEncoder().encode("user2Pass"))
                .roles("USER")
                .build();
            UserDetails admin = User.withUsername("admin")
                .password(passwordEncoder().encode("adminPass"))
                .roles("ADMIN")
                .build();
            return new InMemoryUserDetailsManager(user1, user2, admin);
    }
    
    @Bean 
    public PasswordEncoder passwordEncoder() { 
        return new BCryptPasswordEncoder(); 
    }

    @Bean
    public SecurityFilterChain filterChain(HttpSecurity http) throws Exception {
       
    	 http
         .authorizeRequests()
         .antMatchers("/").permitAll() // This will be your home screen URL
         .antMatchers("/resources/css/**").permitAll()
         .antMatchers("/resources/js/**").permitAll()
         .antMatchers("/resources/img/**").permitAll()
         .antMatchers("/resources/fonts/**").permitAll()
         .antMatchers("/resources/json/**").permitAll()
         .anyRequest().authenticated()
         .and()
         .formLogin()
         .defaultSuccessUrl("/postloginscreen") //configure screen after login success
         .loginPage("/login")
         .permitAll()
         .and()
         .logout().logoutRequestMatcher(new AntPathRequestMatcher("/logout")).logoutSuccessUrl("/login").permitAll();
	return http.build();
    }
//
//	private LogoutSuccessHandler logoutSuccessHandler() {
//		// TODO Auto-generated method stub
//		System.out.println("logout Success Handler!");
//		return null;
//	}
//
//	private AuthenticationFailureHandler authenticationFailureHandler() {
//		// TODO Auto-generated method stub
//		System.out.println("auth Failure Handler!");
//		return null;
//	}
}
