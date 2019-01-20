RepaymentSchedule
=====================
2017-12-03



This model allows for both recurring payments, and scheduled payments.


- totalRaw: null|number
            For recurring payments, this is null.
            For scheduled payments, this is set.
- total: null|string    
            The formatted version of totalRow
- items:
    - time: timestamp of the capture moment             
    - label: string
    - priceRaw: number, the amount to capture
    - price: string, the formatted version of priceRaw 
            
