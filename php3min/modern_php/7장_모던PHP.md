### 모던 PHP
- 오래전 코드가 있어 현대적 방식으로 PHP를 개발하고자 하는 일종의 흐름 

1. PHP 내장웹서버 실행 
- 쉘 실행
- PHP 폴더로 이동 (xampp\php)
- php.exe -S localhost:8000 실행

2. 익명함수 사용하기 
- 익명함수는 한번만 사용할 일회성 함수로 이름이 없는 함수
- array_filter(배열, 콜백함수); 형식으로 다음과 같이 작동 
  > - 내부적으로 배열항목을 순회하면서 하나씩 콜백 함수에 인자로 전달
  > - 콜백함수는 배열항목이 조건에 맞는지 검사하고 true 혹은 false를 리턴한다. 

3. 네임스페이스 
- 각각의 기능에 이름공간을 붙여서 구분할 수 있게 해주는 기능
- 활용은 use를 통해 

4. 오토로드 사용
- 오토로드는 클래스가 호출될 때 자동으로 특정파일을 불러오고 실행하는 PHP 특유의 기능
- 네임스페이스의 클래스명으로 파일의 이름이 일치해야한다.

5. 컴포저 
- 컴포저는 의존성 라이브러리 관리자를 말한다.
- 설치명령어 (파일경로는 수정)
```vbnet 
D:\programs\xampp\php\php.exe -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
D:\programs\xampp\php\php.exe composer-setup.php
D:\programs\xampp\php\php.exe -r "unlink('composer-setup.php');
```

