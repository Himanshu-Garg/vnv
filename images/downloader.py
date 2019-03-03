import requests
from bs4 import BeautifulSoup as BS
res = requests.get('https://vnvclasses.com/')
soup = BS( res.text , 'html.parser')
menus = soup.find('ul' , {'id' : 'menu-physics'})

headers = {'user-agent': 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2228.0 Safari/537.36'}

for menu in menus :
#     print(menu)
    page = menu.a['href']
#     print('page')
    heading = page.split('/')[-2].replace('-' , ' ').capitalize()
    print(heading)
    res = requests.get(page , headers=headers)
    soup = BS(res.text , 'html.parser')
    
    videos = soup.find_all('div' , {'class' : 'item'})
    
    links = []
    images = []
    titles = []
    ytlinks = []
    # print(videos)
    for video in videos :
        links.append( video.div.a['href'] )
        images.append( video.div.a.img['src'] )
        titles.append( video.find('div' , {'class' : 'title'} ).text  )
    print(links)
    print(images)
    print(titles)
    
    for link in links :
        
        soup1 = BS( requests.get(link , headers = headers).text , 'html.parser')
        iframe = soup1.find('iframe')
        ytlink = "https://www.youtube.com/watch?v=" + iframe['src'].split('/')[-1].split('?')[0]
        ytlinks.append()
    
    
    print(ytlinks)
    
    
