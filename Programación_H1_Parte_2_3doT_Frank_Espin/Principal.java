package Programación_H1_Parte_2_3doT_Frank_Espin;

import java.util.Scanner;

public class Principal {
    public static void main(String[] args) {
        SistemaAnimales sistema = new SistemaAnimales();
        Scanner scanner = new Scanner(System.in);
        int opcion;

        System.out.println("\nTrabajo realizado por FRANK");

       
        // Menú 
        do {
        	System.out.println();
        	System.out.println("BIENVENIDO AL MENU DE LA PROTECTORA");
        	System.out.println();
            System.out.println("*************************** MENÚ ***************************");
            System.out.println("1 – Dar de alta animal");
            System.out.println("2 – Listar animales");
            System.out.println("3 – Buscar animal");
            System.out.println("4 – Realizar adopción");
            System.out.println("5 – Dar de baja");
            System.out.println("6 – Mostrar estadísticas de gatos");
            System.out.println("7 – Salir");
            System.out.print("Elige una opción: ");
            System.out.println();
            System.out.println("************************************************************");
            opcion = scanner.nextInt();
            scanner.nextLine(); 

            switch (opcion) {
                case 1:
                    System.out.print("¿Es un gato o perro? (g/p): ");
                    String tipo = scanner.nextLine();
                    System.out.print("Número de chip: ");
                    String chip = scanner.nextLine();
                    System.out.print("Nombre: ");
                    String nombre = scanner.nextLine();
                    System.out.print("Edad: ");
                    int edad = scanner.nextInt();
                    scanner.nextLine(); 
                    System.out.print("Raza: ");
                    String raza = scanner.nextLine();

                    if (tipo.equalsIgnoreCase("p")) {
                        System.out.print("¿Está vacunado? (true/false): ");
                        boolean vacunado = scanner.nextBoolean();
                        System.out.print("Tamaño (Pequeño/Mediano/Grande): ");
                        scanner.nextLine(); 
                        String tamano = scanner.nextLine();
                        sistema.altaAnimal(new Perro(chip, nombre, edad, raza, vacunado, tamano));
                    } else if (tipo.equalsIgnoreCase("g")) {
                        System.out.print("¿Está vacunado? (true/false): ");
                        boolean vacunado = scanner.nextBoolean();
                        System.out.print("¿Es doméstico? (true/false): ");
                        boolean domestico = scanner.nextBoolean();
                        scanner.nextLine(); 
                        sistema.altaAnimal(new Gato(chip, nombre, edad, raza, vacunado, domestico));
                    } else {
                        System.out.println("Tipo no válido.");
                    }
                    break;

                case 2:
                    sistema.listarAnimales(); 
                    break;

                case 3:
                    System.out.print("Introduce el número de chip: ");
                    String chipBusqueda = scanner.nextLine();
                    sistema.buscarAnimalID(chipBusqueda);
                    break;

                case 4:
                    System.out.print("Número de chip del animal: ");
                    String chipAdopcion = scanner.nextLine();
                    System.out.print("Nombre del adoptante: ");
                    String nombreAdoptante = scanner.nextLine();
                    System.out.print("DNI del adoptante: ");
                    String dniAdoptante = scanner.nextLine();
                    sistema.realizarAdopcion(chipAdopcion, nombreAdoptante, dniAdoptante);
                    break;

                case 5:
                    System.out.print("Introduce el número de chip del animal a dar de baja: ");
                    String chipBaja = scanner.nextLine();
                    sistema.bajaAnimal(chipBaja);
                    break;

                case 6:
                	sistema.estadisticasGatos();
                    break;

                case 7:
                    System.out.println("Has cerrado el programa ¡Hasta pronto!");
                    break;

                default:
                    System.out.println("Opción no válida.");
            }
        } while (opcion != 7);

        scanner.close();
    }
}

