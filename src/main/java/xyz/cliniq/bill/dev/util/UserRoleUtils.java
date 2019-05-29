package xyz.cliniq.bill.dev.util;

import xyz.cliniq.bill.dev.dao.UserRoleDAO;
import xyz.cliniq.bill.dev.dto.UserRole;

public class UserRoleUtils {
    private UserRoleUtils() {
    }

    public static UserRole convertToUserRole(UserRoleDAO roleDAO) {
        UserRole userRole = new UserRole();
        userRole.setUserRoleId(roleDAO.getUserRoleId());
        userRole.setUserRole(roleDAO.getUserRole());
        userRole.setDescription(roleDAO.getDescription());

        return userRole;
    }
}
