package Programacion_H2_Parte1_3T_FrankEspin;

import java.sql.*;

public class GestionPeliculas {

    public static void verPeliculas() {
        String sql = "SELECT p.id_pelicula, p.titulo, p.anio, g.nombre AS genero, p.duracion_min, p.director " +
                     "FROM peliculas p JOIN generos g ON p.genero_id = g.id_genero";

        try (Connection conn = Conecta_cine_frankespin.getConexion();
             Statement stmt = conn.createStatement();
             ResultSet rs = stmt.executeQuery(sql)) {

            System.out.println("\nPelículas disponibles:");
            while (rs.next()) {
                System.out.printf("ID: %d | Título: %s | Año: %d | Género: %s | Duración: %d min | Director: %s%n",
                        rs.getInt("id_pelicula"),
                        rs.getString("titulo"),
                        rs.getInt("anio"),
                        rs.getString("genero"),
                        rs.getInt("duracion_min"),
                        rs.getString("director"));
            }

        } catch (SQLException e) {
            System.out.println("Error al obtener las peliculas");
            e.printStackTrace();
        }
    }
    
}
