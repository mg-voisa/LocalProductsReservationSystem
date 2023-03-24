package com.demo.frontend.dao;

import java.util.Collection;

import com.demo.frontend.model.Booking;

public interface BookingRepository {
	Collection<Booking> getBooks();
    Booking addBook(Booking book);
}
