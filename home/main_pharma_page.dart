import 'package:flutter/material.dart';

class MainPharmaPage extends StatefulWidget {
  const MainPharmaPage({super.key});

  @override
  State<MainPharmaPage> createState() => _MainPharmaPageState();
}

class _MainPharmaPageState extends State<MainPharmaPage> {
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      body: Container(
        child: Container(
          child: Row(
            children: [
              Column(children: [
                Text('Home'),
                Text('Accueil'),
              ],
            ),
              Container(
                width: 45,
                height: 45,
                decoration: BoxDecoration(
                  borderRadius: BorderRadius.circular(15),
                  color: Colors.green,
                ),
              ),
            ],
          ),
        ),
      ),
    );
  }
}
