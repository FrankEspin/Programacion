import mysql.connector

conexion = mysql.connector ("SUPERMERCADO")
def conectar():
    #conexion a la base de datos
    conexion = mysql.connector.connect(
        host = "localhost",
        user = "root",
        password="curso",
        database="SUPERMERCADO"
    )
    return conexion

# Crear un cursor
cursor = conexion.cursor()

#CREAR
id_categoria = input("Ingresa el ID de la categoría: ")
nombre_categoria = input("Ingresa el nombre de la categoría: ")

# Ejecutar la consulta SQL para insertar los valores
cursor.execute("INSERT INTO categoria (idcategoria, nombre) VALUES (?, ?)", (id_categoria, nombre_categoria))

cursor.close()
conexion.close()

#LEER
import mysql.connector

conexion = mysql.connector ("SUPERMERCADO")
def conectar():
    #conexion a la base de datos
    conexion = mysql.connector.connect(
        host = "localhost",
        user = "root",
        password="curso",
        database="SUPERMERCADO"
    )
    return conexion

cursor= conexion.cursor()

cursor.execute("SELECT idcategoria * FROM categoria")

categorias = cursor.fetchall()
if categorias:
    print("Listado de Categorías:")
    for categoria in categorias:
        print(f"ID: {categoria[0]}, Nombre: {categoria[1]}")
else:
    print("No hay categorías disponibles.")
conexion.close()

#ACTUALIZAR

import mysql.connector

conexion = mysql.connector ("supermercado")
def conectar():
    #conexion a la base de datos
    conexion = mysql.connector.connect(
        host = "localhost",
        user = "root",
        password="curso",
        database="supermercado"
    )
    return conexion
cursor= conexion.cursor()



# Solicitar al usuario el idcategoria y el nuevo nombre de la categoría
id_categoria = input("Ingresa el ID de la categoría que deseas modificar: ")
nuevo_nombre = input("Ingresa el nuevo nombre de la categoría: ")

# Ejecutar la consulta SQL para actualizar el registro
cursor.execute("UPDATE categoria SET nombre = ? WHERE idcategoria = ?", 
               (nuevo_nombre, id_categoria))

# Verificar si se actualizó algún registro
if cursor.rowcount > 0:
    print(f"La categoría con ID {id_categoria} ha sido actualizada a '{nuevo_nombre}'.")
else:
    print("No se encontró una categoría con ese ID o no se realizó ninguna modificación.")

# Cerrar la conexión
conexion.close()

#ELIMINAR

# Solicitar al usuario el idcategoria del registro que desea eliminar
id_categoria = input("Ingresa el ID de la categoría que deseas eliminar: ")

# Ejecutar la consulta SQL para eliminar el registro
cursor.execute("DELETE FROM categoria WHERE idcategoria = ?", (id_categoria,))

# Verificar si se eliminó algún registro
if cursor.rowcount > 0:
    print(f"La categoría con ID {id_categoria} ha sido eliminada.")
else:
    print("No se encontró una categoría con ese ID o no se realizó ninguna eliminación.")

# Cerrar la conexión
conexion.close()