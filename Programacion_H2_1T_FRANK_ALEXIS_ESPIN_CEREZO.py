# HITO 2 del 1º trimestre
# PSEUDOCODIGO

#Inicio
#Definimos las clases (cliente, producto, pedido)
#Hacemos una lista para almacenar los clientes
#Definimos las funciones (registrar_cliente, mostrar_cliente,
# buscar_cliente, realizar_compra, seguimiento_compra y menu)
# Hacemos una lista para guardar los productos
#FIN

class Cliente:
    def __init__(self, id_cliente, nombre, direccion, correo):
        self.id_cliente = id_cliente  # ID único
        self.nombre = nombre
        self.direccion = direccion
        self.correo = correo
        
class Producto:
    def __init__(self, id_producto, nombre, precio, cantidad):
        self.id_producto = id_producto  # ID único
        self.nombre = nombre
        self.precio = precio
        self.cantidad = cantidad

class Pedido:
    def __init__(self, id_pedido, cliente, productos, fecha, estado):
        self.id_pedido = id_pedido  # ID único
        self.cliente = cliente  # Referencia al cliente
        self.productos = productos  # Lista de productos comprados
        self.fecha = fecha  # Fecha de la compra
        self.estado = estado  # Estado del pedido, e.g. "Pendiente", "Enviado", etc.

clientes = []  # Lista que almacena todos los clientes registrados

#PSEUDOCOGIDO DE LA FUNCION REGISTRAR_CLIENTE
#INICIO
# Definir la funcion registrar_cliente
# Añadiremos id_cliente
# Nombre del cliente
# Direccion
# Correo
# Creamos la variable nuevo_cliente (Para los nuevos clientes)
#FIN
def registrar_cliente():
    id_cliente = input("Introduce el ID único del cliente: ")
    nombre = input("Introduce el nombre del cliente: ")
    direccion = input("Introduce la dirección del cliente: ")
    correo = input("Introduce el correo electrónico del cliente: ")
    
    nuevo_cliente = Cliente(id_cliente, nombre, direccion, correo)
    clientes.append(nuevo_cliente)
    print(f"Cliente {nombre} registrado exitosamente.")

#PSEUDOCOGIDO DE LA FUNCION MOSTRAR_CLIENTE
#INICIO
# Definir la funcion mostrar_cliente
# Utilizaremos el bucle if para ver si hay clientes registrados o no
# Si hay clientes los visualizaremos con un print
#FIN

def mostrar_clientes():
    if not clientes:
        print("No hay clientes registrados.")
    else:
        for cliente in clientes:
            print(f"ID: {cliente.id_cliente}, Nombre: {cliente.nombre}, Correo: {cliente.correo}")

#PSEUDOCOGIDO DE LA FUNCION BUSCAR_CLIENTE
#INICIO
# Definir la funcion buscar_cliente
# Utilizaremos el bucle for para buscar el cliente 
#FIN

def buscar_cliente(id_cliente):
    for cliente in clientes:
        if cliente.id_cliente == id_cliente:
            return cliente
    return None

productos_disponibles = [
    Producto("01", "Manzana", 100, 10),
    Producto("02", "Tomate", 200, 5),
    Producto("03", "Platano", 150, 8),
    Producto("04", "Limon", 100, 10),
    Producto("05", "Lechuga", 200, 5),
    Producto("06", "Cebolla", 150, 8),
]

pedidos = []  # Lista que almacena los pedidos realizados

# PSEUDOCODIGO REALIZAR_COMPRA
#INICIO
# Definimos la función realizar_compra
# Llamaremos a la funcion buscar_cliente para ver si el cliente está resistrado
# Con un bucle for buscaremos el producto en la lista 
# Con un print mostraremos los productos disponibles
# Haremos una lista para los productos seleccionados
# Mediante un WHILE introduciremos el id de un producto para añadirlo, para finalizar escribiremos (fin) 
# Daremos la opcion de elegir cuanta cantida de ese mismo producto quiere.
# Con un bucle if veremos si la cantidad escogida del usuario es posible o no
#FIN

def realizar_compra(id_cliente):
    cliente = buscar_cliente(id_cliente)
    if not cliente:
        print("Cliente no encontrado.")
        return
    
    print("Productos disponibles:")
    for producto in productos_disponibles:
        print(f"{producto.id_producto} - {producto.nombre} - Precio: {producto.precio} - Stock: {producto.cantidad}")
    
    productos_seleccionados = []
    while True:
        id_producto = input("Introduce el ID del producto para añadir al pedido (o 'fin' para terminar): ")
        if id_producto == 'fin':
            break
        
        producto = next((p for p in productos_disponibles if p.id_producto == id_producto), None)
        if producto:
            cantidad = int(input(f"¿Cuántos {producto.nombre} deseas comprar? "))
            if cantidad <= producto.cantidad:
                productos_seleccionados.append((producto, cantidad))
                producto.cantidad -= cantidad
            else:
                print(f"No hay suficiente stock de {producto.nombre}.")
        else:
            print("Producto no encontrado.")
    
    if productos_seleccionados:
        id_pedido = len(pedidos) + 1  # Generación de ID único para el pedido
        fecha = "2024-11-11"  # Fecha de la compra (esto puede ser dinámico)
        nuevo_pedido = Pedido(id_pedido, cliente, productos_seleccionados, fecha, "Pendiente")
        pedidos.append(nuevo_pedido)
        print(f"Pedido {id_pedido} realizado exitosamente.")

# PSEUDOCODIGO REALIZAR_COMPRA
#INICIO
# Definimos la función seguimiento_compra
# Definimos la variable pedido para buscar con el ID si existe el pedido
# Imprimiremos Pedido, Fecha, Estado del pedido
# Utilizaremos un bucle for para sacar el nombre del producto, cantidad y el precio
# Con un print imprimiremos el resultado de lo anterior
#FIN

def seguimiento_compra(id_pedido):
    pedido = next((p for p in pedidos if p.id_pedido == id_pedido), None)
    if not pedido:
        print("Pedido no encontrado.")
        return
    
    print(f"Pedido {id_pedido} - Cliente: {pedido.cliente.nombre}")
    print(f"Fecha: {pedido.fecha}")
    print(f"Estado: {pedido.estado}")
    print("Productos comprados:")
    for producto, cantidad in pedido.productos:
        print(f"{producto.nombre} - Cantidad: {cantidad} - Precio: {producto.precio}")

#PSEUDOCOGIDO FUNCION MENU
#INICIO
# Definiremos la funcion del menu para que el usuario pueda visualizar las opciones
# Definiremos la variable opcion (Para dar a elegir una opcion del menu)
# Mediante un bucle IF mostraremos la opcion que haya elegido el usuario
# Si la opcion no es valida, mediante un print imprimiremos "Opcion no valida"
# Llamaremos a la funcion menú
#FIN

def menu():
    while True:
        print("\n--- Menú Principal ---")
        print("1. Registrar cliente")
        print("2. Mostrar todos los clientes")
        print("3. Realizar compra")
        print("4. Seguimiento de compra")
        print("5. Salir")
        
        opcion = input("Elige una opción: ")
        
        if opcion == '1':
            registrar_cliente()
        elif opcion == '2':
            mostrar_clientes()
        elif opcion == '3':
            id_cliente = input("Introduce el ID del cliente para realizar la compra: ")
            realizar_compra(id_cliente)
        elif opcion == '4':
            id_pedido = int(input("Introduce el número de pedido para hacer el seguimiento: "))
            seguimiento_compra(id_pedido)
        elif opcion == '5':
            print("Gracias por usar la aplicación.")
            break
        else:
            print("Opción no válida.")

if __name__ == "__main__":
    menu()
