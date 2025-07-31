<?php
$directory = __DIR__ . "/uploads";

// Prüfen, ob das Verzeichnis existiert
if (!is_dir($directory)) {
    echo "Ordner nicht gefunden: " . htmlspecialchars($directory);
    exit;
}

// Verzeichnisinhalt auflisten, ohne '.' und '..' Einträge
$items = array_diff(scandir($directory), ['.', '..']);

echo "<div>";
// Durch alle Elemente iterieren
foreach ($items as $item) {
    $fullPath = $directory . DIRECTORY_SEPARATOR . $item;
    $isDir = is_dir($fullPath);
    $name = htmlspecialchars($item);
    $type = $isDir ? "Ordner" : "Datei";
    
    // Größe ermitteln (nur für Dateien, nicht für Ordner)
    $size = $isDir ? "-" : formatFileSize(filesize($fullPath));
    
    // Element mit Typ und Größe anzeigen
    echo "<div><strong>$type:</strong> $name | Größe: $size</div>";
}
echo "</div>";

// Bilder anzeigen
echo "<h2>Bildergalerie</h2>";
echo "<div>";

// Durch alle Elemente iterieren und Bilder anzeigen
foreach ($items as $item) {
    $fullPath = $directory . DIRECTORY_SEPARATOR . $item;
    if (!is_dir($fullPath)) {
        $extension = strtolower(pathinfo($item, PATHINFO_EXTENSION));
        $imageTypes = ['jpg', 'jpeg', 'png', 'gif', 'webp', 'bmp'];
        
        // Prüfen, ob es sich um ein Bild handelt
        if (in_array($extension, $imageTypes)) {
            $name = htmlspecialchars($item);
            
            echo "<div>";
            echo "<img src='/uploads/$item' alt='$name' style='max-width: 200px; max-height: 200px;'>";
            echo "<div>$name</div>";
            
            // EXIF-Daten und Thumbnail anzeigen
            if (in_array($extension, ['jpg', 'jpeg'])) {
                // Exif-Daten des Bildes auslesen
                $exif = @exif_read_data($fullPath);
                
                if ($exif) {
                    // Bildinformationen anzeigen
                    echo "<h3>$name</h3>";
                    if (isset($exif['COMPUTED']['Width']) && isset($exif['COMPUTED']['Height'])) {
                        echo "Bildgröße: " . $exif['COMPUTED']['Width'] . "x" . $exif['COMPUTED']['Height'] . "<br>";
                    }
                    if (isset($exif['DateTimeOriginal'])) {
                        echo "Aufnahmedatum: " . $exif['DateTimeOriginal'] . "<br>";
                    }
                    
                    // Thumbnail des Bildes anzeigen
                    $thumbnail = @exif_thumbnail($fullPath, $width, $height, $type);
                    if ($thumbnail !== false) {
                        echo "<img src='data:image/jpeg;base64," . base64_encode($thumbnail) . "' alt='Thumbnail'><br>";
                    } else {
                        echo "Kein Thumbnail verfügbar<br>";
                    }
                }
            }
            
            echo "</div>";
        }
    }
}
echo "</div>";

// Formatiert die Dateigröße
function formatFileSize($bytes) {
    if ($bytes >= 1073741824) {
        return round($bytes / 1073741824, 2) . " GB"; // Gigabyte
    } elseif ($bytes >= 1048576) {
        return round($bytes / 1048576, 2) . " MB"; // Megabyte
    } elseif ($bytes >= 1024) {
        return round($bytes / 1024, 2) . " KB"; // Kilobyte
    } else {
        return $bytes . " Bytes"; // Bytes
    }
}
?>