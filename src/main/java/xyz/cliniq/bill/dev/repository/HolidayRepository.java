package xyz.cliniq.bill.dev.repository;


import org.springframework.data.jpa.repository.JpaRepository;
import xyz.cliniq.bill.dev.dao.HolidayDAO;

public interface HolidayRepository extends JpaRepository<HolidayDAO, Integer> {
}
