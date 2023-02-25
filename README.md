# UE4 - MySQL DB - Apache 연동

## 서버/DB 전체 시스템 설계 구조
![image](https://user-images.githubusercontent.com/60374155/220970378-30bf1878-fa81-4b49-be1d-55162a6464dc.png) <br>
설치 버전 : Apache2.4.53, PHP8, MySQL8.0 <br>

## MySQL DB 테이블 구조
1. DB 스키마 <br>
![image](https://user-images.githubusercontent.com/60374155/220973950-8c136f40-c037-4d47-acb3-c9e6b3d6e947.png) 

2. Table 스키마 <br>
- playerdb: 사용자 정보 <br>
![image](https://user-images.githubusercontent.com/60374155/220974031-55bb1422-653a-4f49-82cd-4f761acc68e6.png)
- playersandwich : 사용자 레시피 정보 <br>
![image](https://user-images.githubusercontent.com/60374155/220974279-e346d050-dd68-4952-92fe-601fd4cb0655.png)

## UE4 - Apache 웹서버 연결
1. http method 사용하여 웹서버와 통신 가능하게 하는 VaRest Plugin 설치한다.(UE 마켓플레이스) <br>
2. Rest Server통신 지원하는 Va Rest Subsystem 을 Call URL 함수와 연결하여 서버에 http request한다. <br>
3. 요청한 기능을 처리하는 php 파일 실행 후 Get Json Object 함수로 결과를 받는다 <br>

## PHP 기능
1. 사용자 가입기능, 로그인 기능 구현 - 사용자 정보(데이터) 저장, 조회
2. 관심메뉴 기능 - 주문한 레시피 저장, 등록한 레시피 조회

### 사용자 정보 조회 ###
FindPlayer Event: 사용자 닉네임으로 DB에 정보가 있는지 조회 <br>

![image](https://user-images.githubusercontent.com/60374155/221089404-4b1e6d9f-83a7-4900-80b2-42d2feec3be2.png)

### 사용자 데이터 저장 ###
AddPlayer Event: 사용자 정보 조회 후 DB에 사용자 등록 <br>

![image](https://user-images.githubusercontent.com/60374155/221091762-28da751d-db4a-4737-978f-ba2fd18d8198.png)
### 주문한 레시피 저장 ###
![image](https://user-images.githubusercontent.com/60374155/221332319-acc50500-0709-45b8-9e36-09c436f1501e.png)
![image](https://user-images.githubusercontent.com/60374155/221332326-99e2761f-9e84-4ff7-b15d-9507b2511cda.png)


### 등록한 레시피 조회 ###
