# 서버/DB 설계 및 UE4 연동

## 서버/DB 전체 시스템 설계 구조
![image](https://user-images.githubusercontent.com/60374155/220970378-30bf1878-fa81-4b49-be1d-55162a6464dc.png)
<br>
설치 버전 : Apache2.4.53, PHP8, MySQL8.0
<br>
UE4와 Apache서버 통신을 Rest기반 설계
## MySQL DB 테이블 설계 구조
1. DB 스키마 <br>
![image](https://user-images.githubusercontent.com/60374155/220973950-8c136f40-c037-4d47-acb3-c9e6b3d6e947.png)
2. User Table : playerdb <br>
![image](https://user-images.githubusercontent.com/60374155/220974031-55bb1422-653a-4f49-82cd-4f761acc68e6.png)
3. Recipe Table : playersandwich <br>
![image](https://user-images.githubusercontent.com/60374155/220974279-e346d050-dd68-4952-92fe-601fd4cb0655.png)
## UE4 - Apache웹서버 통신
1. UE4와 http method 사용하여 웹서버와 통신 가능하게 하는 VaRest Plugin 설치(UE 마켓플레이스) <br>
2.
3.
ue에서 Resource 요청(서진)
apache - php 연동
DB 조회, 수정, 삭제, 조회 코드 작성
ue에 json형식 데이터 반환
