# UE4 - MySQL DB - Apache 연동

## 서버/DB 전체 시스템 설계 구조
![image](https://user-images.githubusercontent.com/60374155/220970378-30bf1878-fa81-4b49-be1d-55162a6464dc.png) <br>
### 설치 버전 ###
Apache2.4.53, PHP8, MySQL8.0

### UE-Apache-DB 연동 과정 ###
Rest Server통신을 지원하는 <strong>Va Rest Subsystem</strong>을 사용하여 UE4에서 서버로 get/post 방식의 http request를 한다. <br>
php파일에서 mysqli 쿼리로 DB 연결 및 데이터를 가져오고, Json타입으로 처리하여 UE에 데이터를 반환한다. <br>

## 코드 실행방법 
1. 웹서버와 통신 가능하게 하는 <strong>VaRest Plugin</strong>을 설치한다.(UE 마켓플레이스) <br>
2. Apache설치 파일의 htdocs 파일에 php파일을 저장후, php파일의 데이터베이스 연결 정보를 변경한다.(개인의 user,password,db)
3. UE4 이벤트 그래프에 Blueprint코드를 복사하고 필요한 변수,이벤트를 생성한다.

## MySQL DB
1. DB Tables <br>
![image](https://user-images.githubusercontent.com/60374155/221397737-42b691b4-c283-4349-ab83-c9588e2c7de0.png) <br>
![image](https://user-images.githubusercontent.com/60374155/220973950-8c136f40-c037-4d47-acb3-c9e6b3d6e947.png) 

2. Table 스키마 <br>
- playerdb: 사용자 정보 <br>
![image](https://user-images.githubusercontent.com/60374155/221397876-50a67de7-fab9-4230-9f9d-c8a93b340373.png)
- playersandwich : 사용자 레시피 정보 <br>
![image](https://user-images.githubusercontent.com/60374155/221397914-20364e9b-4e04-4f93-857a-f809bfd970b1.png)

## PHP 구현 기능
1. 사용자 가입기능, 로그인 기능 <br> - 사용자 정보(데이터) 저장 : insertPlayerInfo.php <br> - 사용자 정보 조회 : selectPlayerInfo.php
2. 관심메뉴 기능 <br> - 주문한 레시피 저장(수정): insertPlayerMenu.php <br> - 등록한 레시피 조회 : selectPlayerMenu.php

## 웹서버 요청 블루프린트
### Blueprint code
[블루프린트 링크 1](https://blueprintue.com/blueprint/jk8xd_yu/) <br>
[블루프린트 링크 2](https://blueprintue.com/blueprint/lj4idt4o/)
### 사용자 정보 조회 
Call URL 함수를 사용해 get방식으로 request <br>
FindPlayer Event: 사용자 닉네임으로 DB에 정보가 있는지 조회 <br>
![image](https://user-images.githubusercontent.com/60374155/221089404-4b1e6d9f-83a7-4900-80b2-42d2feec3be2.png)

### 사용자 데이터 저장
AddPlayer Event: 위의 사용자 정보 조회한 후, DB에 사용자 등록(저장) 요청<br>
![image](https://user-images.githubusercontent.com/60374155/221091762-28da751d-db4a-4737-978f-ba2fd18d8198.png)

### 주문한 레시피 저장(또는 수정)
post방식을 사용하고, 데이터를 json타입으로 설정 <br>
![image](https://user-images.githubusercontent.com/60374155/221343268-95bdf9d4-30cc-43c7-a59b-d6dea98f9525.png)

AddPlayerMenu Event: 사용자 이름과 사용자가 주문한 레시피(Recipe obj)를 Request 변수에 설정 후, Process URL 실행하여 레시피 저장 요청<br>
![image](https://user-images.githubusercontent.com/60374155/221332319-acc50500-0709-45b8-9e36-09c436f1501e.png)
![image](https://user-images.githubusercontent.com/60374155/221332326-99e2761f-9e84-4ff7-b15d-9507b2511cda.png)

### 등록한 레시피 조회 ###
FindPlayerMenu Event: 사용자 닉네임으로 Call URL 함수를 실행하여 저장된 레시피 조회하고, 가져온 데이터(레시피)를 UE 사용을 위한 배열 변수에 저장 <br>
![image](https://user-images.githubusercontent.com/60374155/221332742-cba76a5c-9533-4b43-b2a4-bceca7f3f21a.png)
![image](https://user-images.githubusercontent.com/60374155/221332771-78e23aac-d92e-43f3-99bf-9742dc87ae3e.png)
![image](https://user-images.githubusercontent.com/60374155/221335466-06d88037-21d2-485d-a05c-b30d6ce99639.png)

