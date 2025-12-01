<!DOCTYPE html>
<html lang="en">

<style>
            /* Style pour l'image miniature */
            .thumbnail {
                width: 200px;
                cursor: pointer;
                transition: transform 0.2s;
            }

            .thumbnail:hover {
                transform: scale(1.05);
            }

            /* Style pour la version agrandie */
            .fullImage {
                display: none;
                position: fixed;
                top: 0;
                left: 0;
                width: 50%;
                height: 50%;
                object-fit: contain;
                background: rgba(0, 0, 0, 0.8);
                cursor: zoom-out;
            }
        </style>

<body style="background-color:rgba(0, 0, 0, 0.8);">
    <center>
        <img src="{{ asset('storage/assurances-cartes/' . $assurances->images) }}"
                                            alt="{{ $assurances->id_assurance }}">
    </center>
</body>
</html>
