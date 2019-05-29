package xyz.cliniq.bill.dev.impl;

import lombok.extern.slf4j.Slf4j;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;
import xyz.cliniq.bill.dev.dao.UserRoleDAO;
import xyz.cliniq.bill.dev.dto.UserRole;
import xyz.cliniq.bill.dev.exceptions.UserRoleIsNotPresent;
import xyz.cliniq.bill.dev.repository.UserRoleRepository;
import xyz.cliniq.bill.dev.util.UserRoleUtils;

import java.util.Optional;

@Slf4j
@Service
public class UserRoleService {

    private final UserRoleRepository userRoleRepository;

    @Autowired
    public UserRoleService(UserRoleRepository userRoleRepository) {
        this.userRoleRepository = userRoleRepository;
    }

    public UserRole getUserRoleById(Integer userRoleId) {
        Optional<UserRoleDAO> roleDAO = userRoleRepository.findById(userRoleId);

        if (!roleDAO.isPresent()) {
            throw new UserRoleIsNotPresent();
        }

        return UserRoleUtils.convertToUserRole(roleDAO.get());
    }
}
