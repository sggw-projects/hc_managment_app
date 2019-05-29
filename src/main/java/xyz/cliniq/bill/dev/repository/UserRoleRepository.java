package xyz.cliniq.bill.dev.repository;


import org.springframework.data.jpa.repository.JpaRepository;
import xyz.cliniq.bill.dev.dao.UserRoleDAO;

public interface UserRoleRepository extends JpaRepository<UserRoleDAO, Integer> {
}
