package Programacion_H2_Parte1_3T_FrankEspin;

import java.sql.*;
import java.util.Scanner;

public class Aplicacion_Cine {
	public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);
        int opcion;
        
        do {
            System.out.println("\n ****** MENU PRINCIPAL ******");
            System.out.println("  ");
            System.out.println("1 – Mostrar películas");
            System.out.println("2 – Salir del programa");
            System.out.println("  ");
            System.out.print("Selecciona una opción (1-2): ");
            opcion = scanner.nextInt();

            switch (opcion) {
                case 1:
                    GestionPeliculas.verPeliculas();
                    break;
                case 2:
                    System.out.println("Está saliendo del programa");
                    break;
                default:
                    System.out.println("Está opcion no es Valida.");
            }
        } while (opcion != 2);
        scanner.close();
    }
}
