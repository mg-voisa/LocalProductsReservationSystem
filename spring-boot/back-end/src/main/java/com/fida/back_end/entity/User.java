package com.fida.back_end.entity;

import java.sql.Timestamp;

import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.Table;

import com.fasterxml.jackson.annotation.JsonIgnore;

@Entity
@Table(name = "utilizatori")
public class User {
	@GeneratedValue(strategy=GenerationType.IDENTITY) // automatically generated primary key.
	@Id  // Primary key.
	@Column(name="id")
	private Long id;
	
	@Column(name = "nume")
	private String nume;
	
	@Column(name = "prenume")
	private String prenume;
	
	@Column(name = "email")
	private String email;
	
	@Column(name = "parola")
	@JsonIgnore
	private String parola;


	@Column(name = "tip", nullable=false)
	private Long tip;

	
	@Column(name = "created_at")
	private Timestamp created_at;


	public Long getId() {
		return id;
	}


	public void setId(Long id) {
		this.id = id;
	}


	public String getNume() {
		return nume;
	}


	public void setNume(String nume) {
		this.nume = nume;
	}


	public String getPrenume() {
		return prenume;
	}


	public void setPrenume(String prenume) {
		this.prenume = prenume;
	}


	public String getEmail() {
		return email;
	}


	public void setEmail(String email) {
		this.email = email;
	}


	public String getParola() {
		return parola;
	}


	public void setParola(String parola) {
		this.parola = parola;
	}


	public Long getTip() {
		return tip;
	}


	public void setTip(Long tip) {
		this.tip = tip;
	}


	public Timestamp getCreated_at() {
		return created_at;
	}


	public void setCreated_at(Timestamp created_at) {
		this.created_at = created_at;
	}


	public User(Long id, String nume, String prenume, String email, String parola, Long tip, Timestamp created_at) {
		super();
		this.id = id;
		this.nume = nume;
		this.prenume = prenume;
		this.email = email;
		this.parola = parola;
		this.tip = tip;
		this.created_at = created_at;
	}


	public User() {
		super();
	}


	@Override
	public String toString() {
		return "User [id=" + id + ", nume=" + nume + ", prenume=" + prenume + ", email=" + email 
				+ ", tip=" + tip + ", created_at=" + created_at + "]";
	}
	
	
	
}
