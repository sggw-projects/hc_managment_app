package xyz.cliniq.bill.dev.dao;

import lombok.AllArgsConstructor;
import lombok.Getter;
import lombok.NoArgsConstructor;
import lombok.Setter;

import javax.persistence.*;
import java.util.Date;

@Getter
@Setter
@NoArgsConstructor
@AllArgsConstructor
@Entity
@Table(name = "Holiday")
public class HolidayDAO {
    @Id
    @GeneratedValue(strategy = GenerationType.AUTO)
    private Integer holidayId;

    @Column(name = "holidayTypeId")
    private Integer holidayTypeId;

    @Column(name = "billingDate")
    private Date dateFrom;

    @Column(name = "billingDate")
    private Date dateTo;
}
