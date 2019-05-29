package xyz.cliniq.bill.dev.repository;


import org.springframework.data.jpa.repository.JpaRepository;
import xyz.cliniq.bill.dev.dao.UserDAO;

public interface UserRepository extends JpaRepository<UserDAO, Integer> {
}
