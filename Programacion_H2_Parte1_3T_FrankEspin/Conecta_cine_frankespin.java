package Programacion_H2_Parte1_3T_FrankEspin;

import java.sql.*;

public class Conecta_cine_frankespin {
	
	 public static Connection getConexion() {
	        String url = "jdbc:mysql://localhost:3307/cine_frankespin";
	        String usuario = "root"; 
	        String contraseña = "curso";  

	        try {
	            return DriverManager.getConnection(url, usuario, contraseña);
	        } catch (SQLException e) {
	            System.out.println("Error al conectarse a la base de datos:");
	            e.printStackTrace();
	            return null;
	        }
	    }
	}
