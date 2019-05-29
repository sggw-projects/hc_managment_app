package xyz.cliniq.bill.dev.dto;

import lombok.*;

import java.math.BigDecimal;
import java.util.Date;
import java.util.List;

@Builder
@Getter
@Setter
@NoArgsConstructor
@AllArgsConstructor
public class Salary {

    private Integer salaryId;
    private User user;
    private Date billingDate; // ostatni dzień miesiąca rozliczeniowego
    private BigDecimal salary;
    private List<Holiday> holidays;

}
