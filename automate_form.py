from selenium import webdriver
import os
import time

# Inicializa o navegador
driver = webdriver.Edge()

# Abre a página do formulário
driver.get("http://localhost/sigedo/aluno_cadastrar.php")

time.sleep(3)

# Localiza o elemento
nome = driver.find_element("name", "nome")
cpf = driver.find_element("name", "cpf")
rg = driver.find_element("name", "rg")
periodo = driver.find_element("name", "periodo")
curso = driver.find_element("name", "curso")
estado_civil = driver.find_element("name", "estado_civil")
data_nascimento = driver.find_element("name", "data_nascimento")
email = driver.find_element("name", "email")
endereco = driver.find_element("name", "endereco")
telefone = driver.find_element("name", "telefone")
matricula = driver.find_element("name", "matricula")

# Preenche os campos
nome.send_keys("Edilson Alzemand Sigmaringa Junior")
cpf.send_keys("248.912.420-00")
rg.send_keys("123456789")
periodo.send_keys("1")
curso.send_keys("Sistemas de Informação")
estado_civil.send_keys("Solteiro")
data_nascimento.send_keys("01/01/1990")
email.send_keys("email@outlook.com")
endereco.send_keys("Rua 1")
telefone.send_keys("999999999")
matricula.send_keys("123456789")


# Esperar a validação do navegador
click = input("Pressione qualquer tecla para continuar...")