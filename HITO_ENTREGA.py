#Cuestion 1 Hito de programación FRANK_ESPIN
 #  PSEUDOCOGIGO Cuestion 1 FRANK
    #INICIO
    # definimos la funcion para el cuadrado con (Mostrar_cuadrado)
    # definimos la funcion para el rectangulp con (mostrar_rectangulo)
    # definimos la funcion para el menu el cual va a contener cuadrado y rectangulo
    # creamos la variable (opcion) para que el usuario ingrese una de las 2 figuras
    # Utilizamos if para la opcion cuadrado
    # Utilizamos la elif para la opcion rectangulo
    # utilizamos else para finalizar si no se ha escogido una de las dos opciones de figuras
    #FIN
    
def mostrar_cuadrado(tamaño): #Funcion del cuadrado
    for cuadrado in range (tamaño):
        print ("*" * tamaño)
    
def mostrar_rectangulo (base, altura): # Funcion del rectangulo
    for rectangulo in range (altura):
        print("*" * base)

def menu(): #Funcion del menu de las figuras
    print("Seleccione una figura")
    print("cuadrado")
    print("rectangulo")

#Inicia la ejecución del programa
opcion = input("Ingrese su opción (cuadrado o rectangulo): ") #Presentamos las opciones cuadrado rectangulo

if opcion == "cuadrado":
    tamaño = int(input("ingrese el tamaño del cuadrado: "))
    mostrar_cuadrado(tamaño) 
    print(f"El area del cuadrado es: {tamaño*tamaño}")
    print(f"EL perimetro es :{tamaño+tamaño+tamaño+tamaño}")
elif opcion == "rectangulo":
    base = int(input("Ingrese la base del rectangulo"))
    altura = int(input("Ingrese la altura del rectangulo"))
    mostrar_rectangulo(base, altura)
    print(f"El area del rectangulo es: {base*altura}")
    print(f"EL perimetro es :{base+base+altura+altura}")
else:
    print("Figura no valida, ingrese una figura correcta")
    
    ################################################ EJERCICIO 2
    
    #CUESTION 2 HITO1 FRANK_ESPIN
#PSEUDOCODIGO CUESTION 2
#INICIO
#Creamos la funcion jugar
#Pedimos las opciones al usuario
#si pone un numero no valido imprimirá "Ingresa opcion valida"
#Despues pedimos opcion a la maquina
# Utilizamos un if para determinar las opciones (Empate, Victoria o Derrota)

import random

def jugar():
    opciones = {1: "Piedra", 2: "Papel", 3: "Tijera"}
    
    while True:
        try:
            opcion_usuario = int(input("Introduce un número (1: piedra, 2: papel, 3: tijera): "))#Pedimos una opcion al usuario
            if opcion_usuario in opciones: 
                break
            else:
                print("Opción no válida. Ingresa una opción correcta.")
        except ValueError:
            print("Ingresa una opción válida.")# Imprimirá esto si el usuario a ingresado un numero que no es (1,2 o 3)

    opcion_maquina = random.randint(1, 3) #Pedimos una opcion a la maquina
    print(f"\nTu opción: {opciones[opcion_usuario]}")
    print(f"Opción máquina: {opciones[opcion_maquina]}")

    if opcion_usuario == opcion_maquina: 
        print("Empate")#Si las 2 opciones son  iguales será empate
    elif (opcion_usuario == 1 and opcion_maquina == 3) or \
         (opcion_usuario == 2 and opcion_maquina == 1) or \
         (opcion_usuario == 3 and opcion_maquina == 2):
        print("Ganaste")#Si las opciones del usuario ganan a la maquina segun las reglas del juego habremos ganado
    else: 
        print("Perdiste")#Si las opciones de la maquina ganan a las del usuario segun las reglas del juego habremos perdido 

# Para iniciar el juego
jugar()

############################################### EJERCICIO 3

#FRANK
#Inicio
    #Definir función
    #Crear menu
    #Opcion 1 
        #Comprobar todas sus posibilidades
    #Opcion 2
        #Comprobar todas sus posibilidades
    #Opcion 3 
        #Comprobar todas sus posibilidades
    #Opcion 4
        #Comprobar todas sus posibilidades
#FIN


def main():
    saldo = 0    #CREAMOS LA DEFINICION PARA EL SALDO
    
    while True:                  #CREAMOS EL MENU PARA EL USUSARIO
        print("\nMenú:")
        print("1 - Ingresar Dinero")
        print("2 - Retirar Dinero")
        print("3 - Consultar Saldo")  
        print("4 - Salir")
    
        opcion = input( "Elige una opción (1-4): ")        #EL USUSARIO PUEDE ESCOGER ENTRE LOS NUMEROS DEL MENU
        if opcion == '1':
            cantidad = float(input("Ingresa la cantidad de dinero que quiere ingresar: "))
            if cantidad < 0:
                print("No se pueden ingresar cantidades negativas.")  #SE PRODUCE DEBIDO A QUE A INGRESADO UNA CANTIDAD <0 Y SALTARÁ EL MENSAJE CORRESPONDIENTE 
            else:
                saldo += cantidad
                print(f"Has ingresado {cantidad}. Nuevo saldo: {saldo}") #IMPRIMIRA LA CANTIDAD QUE HA INGRESADO Y SU "NUEVO" SALDO

        elif opcion == '2':
            cantidad = float(input("Ingresa la cantidad a retirar: "))
            if cantidad < 0:
                print("No se pueden retirar cantidades negativas.") #SE PRODUCE DEBIDO A QUE EL USUSARIO QUIERE RETIRAR CANTIDADES NEGATIVAS Y SALTARÁ EL MENSAJE CORRESPONDIENTE 
            elif saldo - cantidad < 0:
                print("No puedes retirar más cantidad de la disponible .") #SE PRODUCE DEBIDO A QUE EL USUSARIO QUIERE MÁS CANTIDAD DE LAS DISPONIBLES Y SALTARÁ EL MENSAJE CORRESPONDIENTE
            else:
                saldo -= cantidad
                print(f"Has retirado {cantidad}. Nuevo saldo: {saldo}") #IMPRIMIRA LA CANTIDAD QUE HA RETIRADO Y SU "NUEVO" SALDO

        elif opcion == '3':
            print(f"Tu saldo actual es: {saldo}") #IMPRIMIRA SU SALDO ACTUAL

        elif opcion == '4':
            print("Usted ha escogido la opción salir (SALIENDO...)")  #HA ELEGIDO LA OPCIÓN SAIR
            break

        else:
            print("Opción no válida. Por favor, intenta de nuevo.")
if __name__ == "__main__":
    main()
    