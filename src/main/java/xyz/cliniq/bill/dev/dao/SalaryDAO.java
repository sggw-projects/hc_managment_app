package xyz.cliniq.bill.dev.dao;

import lombok.*;

import javax.persistence.*;
import java.math.BigDecimal;
import java.util.Date;
import java.util.List;

@Builder
@Getter
@Setter
@NoArgsConstructor
@AllArgsConstructor
@Entity
@Table(name = "Salary")
public class SalaryDAO {

    @Id
    @GeneratedValue(strategy = GenerationType.AUTO)
    private Integer salaryId;

    @Column(name = "userDAO")
    @ManyToOne
    @JoinColumn(name = "userId")
    private Integer userId;

    @Column(name = "billingDate")
    private Date billingDate; // ostatni dzień miesiąca rozliczeniowego

    @Column(name = "salary")
    private BigDecimal salary;

    @Column(name = "holiday")
    @ManyToMany(cascade = CascadeType.ALL)
    @JoinTable(
            name = "SalaryHoliday",
            joinColumns = {@JoinColumn(name = "salaryId")},
            inverseJoinColumns = {@JoinColumn(name = "holidayId")}
    )
    private List<HolidayDAO> holidayDAOS;

}
