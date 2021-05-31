The nugget registration system
===========
2021-03-23




In parallel to the [open and close](https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/design/open-vs-close-service-registration.md) registration patterns, 
the advent of the [Ling.Light_Nugget](https://github.com/lingtalfi/Light_Nugget) plugin brings us a third pattern when it comes to service registration.


Again it's all about how some **subscriber** service registers to a **provider** service.


So in the classic **open registration system**, the "registration files" basically end up in the **config/open/$provider** directory.


With the nugget system, it's almost the same, except that the "registration files" basically stay in the subscriber's side, in **config/data/$subscriber**.


Both mechanisms are similar, as they both achieve to put less burden on the container.


The **nugget registration system** was actually older than the new **open registration system**, but you will see both in the **Ling** galaxy.


That being said, the open registration system seems to be the new kid on the block, so it might generally prevail.